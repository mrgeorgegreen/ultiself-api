# Description of realisation
## Architecture

Created two tables Habits objects and its translation. Each Habit must be minimum one translation. 
In Laravel project created two Model (), Controller and Repository (for business logic).

Architecture created with scaling principles and tools: using docker-compose, Busines logic layer.

## Examples 

Example of get request list of Habits:

GET http://localhost:8080/api/habits?skip=0&take=3&locale=de&active=1

There are not any required parameters in the request. 
All of those will be set from the default config file, and return in the response. 
Also there are config of maximum of rows in one page (take parameter).
If Active not include in request, we get all rows.

Example of response:

```json

{
    "habits": [
        {
            "title": "Hydrate",
            "photo1x": "ultiself.com\/storage\/habits\/image-square1x-id-13.jpeg",
            "photo2x": "ultiself.com\/storage\/habits\/image-square2x-id-13.jpeg",
            "photo3x": "ultiself.com\/storage\/habits\/image-square3x-id-13.jpeg",
            "active": 1
        },
        {
            "title": "Reading",
            "photo1x": "ultiself.com\/storage\/habits\/image-square1x-id-54.jpeg",
            "photo2x": "ultiself.com\/storage\/habits\/image-square2x-id-54.jpeg",
            "photo3x": "ultiself.com\/storage\/habits\/image-square3x-id-54.jpeg",
            "active": 0
        }
    ],
    "params": {
        "locale": "en",
        "skip": 0,
        "take": 2,
        "active": null
    }
}
```

## ToDo
Before production needs to add caching and Unit/Component tests in the project.
#Habit List test task for a backend developer
##Habit list description
Mobile Application should have Habits List as you can see on the screenshot.

Each habit has:
- Title
- Photo
- Active / Inactive status
- Other parameters if needed


There are 1000 habits in the database 
Each habit created on 10 languages
Pictures saved in different density 1х, 2х и 3х. 
Habit list can be filtered by search on title.


## What needed to be done

1. Create the architecture and describe the idea how it should work on the backend and in the Application.
2. Create DB structure (migration).
3. Create API for Application.
4. Generate few habits for few languages for tests

Use Laravel
Put the source code to the Git
Write the description in English

## Development Approach
**Bad way**
You just select all habits and send them to the Application. 

**Good way**
You pay most of your attention on how it should optimally work on the Application side so you can create a good backend.

## Presentation
- Before presentation send us the link to the git repository and the description of how it should work (Skype)
- Be ready to share your screen on Skype or Zoom call during the presentation.
- Show the code in your IDE
- Show how API works
- Be ready to change the code on the fly during the presentation.
