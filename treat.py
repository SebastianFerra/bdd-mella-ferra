lineas = []
with open("test.txt", 'r') as file1:
    for line in file1.readlines():
        if "\n" in line:
            temp = line[:-1]
        else:
            temp = line
        lineas.append( "|"+temp+"|")
print(lineas)
with open("test2.txt", "a+") as archivo:
    for line in lineas:
        archivo.write("\n")
        archivo.write(line)