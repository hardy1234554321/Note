import mysql.connector
import configdata as config

class Database:
    def __init__(self):
        pass

    def connect(self, dbhost, dbuser, dbpw):
        self.sqldb = mysql.connector.connect(
            host = dbhost,
            user = dbuser,
            passwd = dbpw
        )
        self.sqlcursor = self.sqldb.cursor()
        return self.sqlcursor

    def query(self, sql):
        self.sqlcursor.execute(sql)

    def insert(self, table, value):
        temp = []
        for key in value:
            temp.append(key + "='" + value[key] + "'")

        sql = 'INSERT INTO ' + table + ' SET ' + (',' . join(temp))
        self.sqlcursor.execute(sql, value)
        self.sqldb.commit()
        return self.sqlcursor.lastrowid

    def update(self, sql, val):
        self.sqlcursor.execute(sql, val)
        self.sqldb.commit()

    def delete(self, table, val):
        sql = "DELETE FROM " + table + " WHERE " + val;
        self.sqlcursor.execute(sql)
        self.sqldb.commit()

    def fetch_all(self):
        result = self.sqlcursor.fetchall()
        return result

    def fetch_one(self):
        result = self.sqlcursor.fetchone()
        return result

db = Database()
db.connect(config.DBINFOR['db03host'], config.DBINFOR['dbuser'], config.DBINFOR['dbpw'])



