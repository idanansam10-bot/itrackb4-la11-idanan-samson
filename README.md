# My Video Game Collection

Created by: Samson Idanan Jr.

[Video Games](http://127.0.0.1:8000/games)

## Part G — Reflection Questions

### 1. Why does route model binding require the model parameter name to match the route parameter?

Route model binding uses the route parameter to identify which model record should be retrieved. The parameter name in the controller must match the route parameter so Laravel can correctly inject the model. If the names do not match, the model binding may not work as expected.

### 2. Why does clicking a Delete link not delete a record?

A normal HTML link sends a GET request, which is used to access a page. The destroy route expects a DELETE request to remove a record. Therefore, a Delete link may open the game's detail page instead of deleting it. A form with `@method('DELETE')` is needed to send the correct request.

### 3. Why does the edit form use `old()` with a second argument?

The second argument provides the existing value from the database when the edit form is first displayed. If validation fails, `old()` restores the values previously entered by the user. This allows the form to retain submitted values while still showing the original record values when there is no previous input.
