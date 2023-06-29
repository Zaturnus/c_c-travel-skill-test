Notes on implementation
    IN GENERAL:
        - I would add more responsiveness to the UI as well as better styling such as custom bootstrap classes that would fit.
        - It could also benefit from a landing page that would have at least the simplest information on what the sports club is about.
        - I would have wanted to implement a login / admin system to make sure only authorized users would be able to manage the records and others would just be able to view them.
        - There should be a sort records feature depending on each category.
        - Searching through records should also be available to both Member Records and the Roster.
        - Adding, editing, and deleting records could be done better with either a popup modal instead of transfering the user to a completely different page all the time.
        - Bulk adding/deleting could also be implemented.
        - CSV exporting could also be done with PHP that I wasn't able to include it. It should at least contain when it was downloaded and the user who downloaded the file.
        - I wasnt able to include adding a new roster record but it would function the same as how you would add a new member record. 
        - Analytics might also be useful to see how many memberships sell more, how long people stay as members on average, etc.
        - I wasn't able to implement with protection against duplicating values of input in mind. I would have liked if information like emails couldnt be duplicated under a single user and across multiple members. same is true for phone numbers.
        - It would have been more ideal to have personally identifiable information to be encrypted when stored in the database.
        - There are quite a number of things that I realized while making this that I could have implemented more efficiently and effectively, however admittedly I've yet to fully learn many of those. 
        
    MEMBER RECORDS: Ideally, the adding, deleting, and updating should be on this page simply as modals just so the user might not have to travel between pages for that.
ADD MEMBER: Allows you to insert a new record of a member.
        - I would sanitize and secure this better so as to avoid other invalid inputs as well as protecting it against basic attacks like SQL injections. Prepared statements for the queries would do it some good.
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
        - Im not sure if members would automatically be in the roster if theyre in the members table, or vice versa. Im making the assumption that if theyre not in the members table, they cannot be added to the roster.
        - The list that the user will see on the Membership Roster page was queried from an inner table join.

Made by: Ayanna Karizze Tiad
         rizze.tiad@gmail.com
         https://github.com/Zaturnus
   
    
