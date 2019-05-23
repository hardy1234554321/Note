from DBconnect import db

# 新增database
sql = 'CREATE DATABASE IF NOT EXISTS mydatabase'
db.query(sql)

# 新增table
sql = 'CREATE TABLE IF NOT EXISTS mydatabase.customers (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), address VARCHAR(255))'
db.query(sql)

# 新增
val = {
    'name': 'shock_hsu',
    'address': 'taiwan',
}
id = db.insert('mydatabase.customers', val)

# 修改
sql = 'UPDATE mydatabase.customers SET address = %s WHERE id = %s'
val = ('taipei', id)
db.update(sql, val)

# 查詢
sql = "SELECT * FROM mydatabase.customers WHERE id = '" + str(id) + "' ORDER BY id DESC"
db.query(sql)
row = db.fetch_all()
print(row)

# 刪除
db.delete('mydatabase.customers', "id=" + str(id))

# 刪除table
db.query("DROP TABLE IF EXISTS mydatabase.customers")

# 刪除database
db.query("DROP DATABASE IF EXISTS mydatabase")

