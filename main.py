import re
pattern = re.compile("^(\S+) (\S+) (\S+) \[([\w:\/]+\s[+\-]\d{4})\] \"(\S+)\s?(\S+)?\s?(\S+)?\" (\d{3}|-) (\d+|-)\s?\"?([^\"]*)\"?\s?\"?([^\"]*)\"?\s")

for i, line in enumerate(open("/home/teun/Downloads/access.log")):
    for match in re.finditer(pattern, line):
        print match.group()
