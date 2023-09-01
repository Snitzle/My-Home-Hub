### To Do

I've been made aware that Job is not a good name to use in a model because of the queue jobs, so I will refactor this on all models that use the phrase Job.

- Fill out Mortgage Migrations
- Fill out Tenancy Agreements Migrations
- Add purchase document uploads for House
- Add Purchase comments
- Add Snags list to jobs page
- Attach images to jobs
- Add Safety certificates to properties
- Add a Content Editor to all textareas instead
- Refactor views to be the correct hierarchy
- Add Breadcrumbs
- Add Start and end date to Property Jobs
- Add Property Job start and end date to seeder
- Define partial resources so only the routes I need are in use
- Add reminder functionality to Property Jobs
- Refactor jobs as Work
- Refactor Inputs to use built in Breeze components ( Is this actually better? )
- Hash everything so I can't see private details in the database
- Add Logic to process prices. Decide on a definite set of rules for input
- Make it so that you can see all previous Mortgages applies to a house. Refactor the model. Add active to the migration
- Add a Mortgage Seeder
- Fix validation on the property edit
- Add styling to form errors
- Add filenames to mortgage files
- Add a Contents section where things that we own can be uploaded in even of fire for theft
- Add logic to complete Jobs
- Write reports for Rosh
- Add a contents section where you can upload information about what you own 
- Add an insurance section
- Add a warranties section to the contents 
- Misc section for rooms to store information about light bulb screw types and wattage 
- Add a mode for Shared Domicile. not just renting, mortgage and leasing. Ask Jeni about this 
- Fix not being able to update property information
- If there are no services, show the service date for the same date as the install date for this year. If late make it red
- Allow multiple users to have the same properties

Boiler Services

- Date
- Just an image upload

Bin Days

- Add a Bin

Bin 

- Name
- Colour
- Pick up date 
- How often does it recur

### To Create

- Insurance Policies
- Create Boiler migration
- Set up Boiler relationships on models

- implement Roles and permissions once basic models and logic are inplemented
- Consider security, how am I going to store this data securely


### Testing 

- Changing options saves 
- Changing options effects said option e.g. notification frequency
