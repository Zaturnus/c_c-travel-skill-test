Notes on implementation
    IN GENERAL:
        - I would add more responsiveness to the UI as well as better styling.
        - I would implement a login / admin system to make sure only authorized users would be able to manage the records and others would just be able to view them
        - There should be a sort records feature depending on each category.
        - Searching through records should also be available to both Member Records and the Roster.
        - Adding, editing, and deleting records could be done better with either a popup modal instead of transfering the user to a completely different page all the time
        - Bulk adding could also be done
        - I wasnt able to include adding a new roster record but it would function the same as how you would add a new member record
        - Analytics might also be useful to see how many memberships sell more, how long people stay as members on average, etc.

           
    MEMBERS: This is where members are able to register their information to the system
        - I made three inputs for email addresses since I'm assuming the rest would serve merely as a backup
        - Same is true for phone_number
            > Both email and phone number will default to an empty string if there are none
        - I am assuming that the date_joined would be the date which the record is made, although perhaps it could be a manual input as well incase it would be correcting of records, or transfering old records to this as a new system.
        - I am assuming you would still be able to see roster information even after a member is removed from the list for the sake of keeping the payment ledger for how much and when they did pay.
        - I made the address simply be a string input, but in a better implementation, I think each aspect of the address can be separate inputs (can be concatenated into a single entry when logged into the database) such as:
            > Home Number / Apartment unit number
            > Street address
            > City
            > Province
            > Country
        
    ROSTER: You can view the full roster information in this page
        - Im not sure if members would automatically be in the roster if theyre in the members table, or vice versa. Im making the assumption that if theyre not in the members table, they cannot be added to the roster


Made by: Ayanna Karizze Tiad
         rizze.tiad@gmail.com
         https://github.com/Zaturnus
   
    