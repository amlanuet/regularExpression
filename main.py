import re
pattern = re.compile("^(\S+) (\S+) (\S+) \[([\w:\/]+\s[+\-]\d{4})\] \"(\S+)\s?(\S+)?\s?(\S+)?\" (\d{3}|-) (\d+|-)\s?\"?([^\"]*)\"?\s?\"?([^\"]*)\"?\s")
ip = []
date = []
methode = []
page = []
page_code = []
who = []

for i, line in enumerate(open("/home/teun/Downloads/access.log")):
    for match in re.finditer(pattern, line):
       # print 'Found on line %s: %s' % (i+1, match.group())
       ip.append(match.group(1))
       date.append(match.group(4))
       methode.append(match.group(5))
       page.append(match.group(6))
       page_code.append(match.group(8))
       who.append(match.group(11))
       #.append(match.group(1))
print(ip)
