lapse_limit = 500

data = [1,2,3,4,700,800,900,1,2,3,500,501]

print(len([x for x in data if x > lapse_limit]))