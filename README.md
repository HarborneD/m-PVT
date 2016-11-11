# m-PVT
A mobile ready implementation of a psychomotor vigilance task (PVT) test. 

This implementation is part of the paper:
Evans, M. S., Harborne, D., & Smith, A. P. (in preparation). Measuring fatigue using a modified mobile version of the Psychomotor Vigilance Task (m-PVT).

It offers a PVT test that can be taken within a browser on most devices. It's aim is to show proof of concept for a system that could help reduce the number of drivers operating public transport while under high levels of fatigue. 

You can find a live implementation here:
https://users.cs.cf.ac.uk/HarborneD/pvt-deployed/pvt-demo.php

Folders:
'm-pvt' contains a php web based solution.

'data processing' contains spreadsheets set up to help quickly analyse the data.


#Customisng the trial setup

First an example URL where all values that are customisable are being set:

https://users.cs.cf.ac.uk/HarborneD/pvt-deployed/trial_setup.php?practise_trials=5&max_trials=55&test_name=header&test_identifier=my-test-01-01-16&participant_id=1234


As a reminder, to customise in this way, take the URL : "https://users.cs.cf.ac.uk/HarborneD/pvt-deployed/trial_setup.php" add a '?' and then list the value name and the value like so "value_name=value"

Each additional value past the first should be separated by '&'.

No spaces should be used. Spaces in values should be replaced with '%20'.

The values:

practise_trials - the number of practise trials to be performed (these are usually they removed from the statistics during analysis and as such are marked so this can be done)

max_trials - the total trials (including the practise trials) to perform. Thus the number of measurable trials will be max_trials minus practise_trials

test_name - this is the header displayed on the setup page. You can use 'test_name=&' (setting it with no value) to remove the header from the setup page (The main header "Psychomotor Vigilance Task (PVT)" will still be present)

test_identifier - this is the identifier used when recording the results. Thus this almost always should be set to ensure you can separate data when analysising.

participant_id - pre populates the participant id text field with the value given. Useful for proving a participant a link that they can just click on and get started ( without having to know their number). That being said - this value is only pre-populated it is not forced (i.e. it can be changed)


You can use a URL with all these values being set, some of them or none of them (just remember to separate them with '&')

If you omit a value from the URL it will be set to it's default. The defaults for each value are:

practise_trials - 3

max_trials - 53

test_name - "Cardiff University Open Day"

test_identifier - "open day - date unspecified"

participant_id - "" (no pre population)



