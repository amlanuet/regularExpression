import re
import pymysql

connection = pymysql.connect("localhost",'user_1','toor',"regulairEx");
cursor = connection.cursor();


pattern = re.compile("^(\S+) (\S+) (\S+) \[([\w:\/]+\s[+\-]\d{4})\] \"(\S+)\s?(\S+)?\s?(\S+)?\" (\d{3}|-) (\d+|-)\s?\"?([^\"]*)\"?\s?\"?([^\"]*)\"?\s")
# ip = []
# date = []
# methode = []
# page = []
# status_code = []
# who = []

for i, line in enumerate(open("/home/teun/Downloads/access.log")):
    for match in re.finditer(pattern, line):
       # print 'Found on line %s: %s' % (i+1, match.group())
       # ip.append(match.group(1))
       # date.append(match.group(4))
       # methode.append(match.group(5))
       # page.append(match.group(6))
       # status_code.append(match.group(8))
       # who.append(match.group(11))
       sql = "INSERT INTO `logs` (`ip`, `date`, `methode`, `page`, `status_code`, `who`) VALUES (%s, %s, %s, %s, %s, %s)"
       cursor.execute(sql, (match.group(1), match.group(4), match.group(5), match.group(6), match.group(8), match.group(11)))
       connection.commit()
       


# sql = "SHOW COLUMNS FROM `logs`"
# cursor.execute(sql)

# result = cursor.fetchall()
# for i in result:
#   print(i)


