row = int(input("Enter row: "))
col = int(input("Enter column: "))

outerlist = []

#Ask the user for numbers
for x in range(row):
    innerlist = []
    print(f"\nRow {x+1}: ")
    for y in range(col):
        num = float(input(f"Enter number {y+1}: "))
        innerlist.append(num)
    outerlist.append(innerlist)
    print()

#Search for number
search = float(input("Search: "))
found = False

#Print the numbers by row
print("\nThe numbers are: ")
for x in outerlist:
    for y in x:
        print(y, end= " ")
    print()

#For loop for searching number
for x in range(row):
    for y in range(col):
        if (outerlist[x][y] == search):
            print(f"\nNumber {search} found at row {x+1}, column {y+1}", end = "\n")
            found = True
if not found:
    print(f"Number {search} is not on the list")
