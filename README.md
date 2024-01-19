## Approach

I've used the Laravel Breeze installation with Inertia and Vue3, 
Out of the box it comes with User management, I've adjusted 

Once you register using the /register route, the top menu should allow you to create teams and projects, from there u can click on the project and assign users to it.

I've included one Test, since both classes are pretty much the same in relationship to a user.

## How to run it

Using a terminal

npm run dev

using a second terminal window

php artisan serve

## TODOS
- Member fields
    - first_name (required)
    - last_name (required)
    - city
    - state
    - country
- Team fields
    - name (required)
- Project fields
    - name (required)
- A member **must** belong to a team. (This will not be  the case initially but can be setup later)
- A member can be **optionally** assigned to **multiple** projects.

## Exit Criteria

- API Endpoints to: Create/Update/Delete/Index/Show teams
- API Endpoints to: Create/Update/Delete/Index/Show members
- API Endpoints to: Create/Update/Delete/Index/Show projects
- API Endpoint to: Update the team of a member
- API Endpoint to: Get the members of a specific team
- API Endpoint to: Add a member to a project
- API Endpoint to: Get the members of a specific project
- Commit the code to a public GitHub repo for the SprintFWD team to assess. Thank you!

## Bonus

- Add tests
- Basic UI for the exit criteria above with Laravel views
