from datetime import datetime
from datetime import timedelta

date_string = "29/04/2016 16:08:15"

date_date = datetime.strptime(date_string, '%d/%m/%Y %H:%M:%S')


print(date_date)
time_d = timedelta(minutes=5)
print(date_date + time_d)