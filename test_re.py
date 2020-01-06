import re
name = "1286.56"

test_re = re.match("^[1-9]\d*(\.\d+)?$",name)
print(test_re)

if not test_re:
     print("Strirnga non valida.")