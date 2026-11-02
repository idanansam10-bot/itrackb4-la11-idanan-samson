# ITRACKB4 - LA10: Your Own Lookup Table

## Part G – Reflection Questions

### G1. Which column did you turn into a table, and why that one and not another?

I turned the `genre` column into a separate `genres` table because video games can share the same genre, such as RPG, MOBA, and Shooter. Creating a lookup table avoids repeatedly storing genre names in the `videogames` table and helps maintain consistent genre records. I chose this column because it contains repeated category values that can be managed more efficiently through a relationship.

### G2. What number did Screenshot 6 show, and why exactly that number?

Screenshot 6 showed **[INSERT YOUR SCREENSHOT 6 QUERY COUNT HERE] queries**. This number includes one query to retrieve all video games and one additional query for each game's genre because the relationship was loaded separately for every record. This demonstrates the N+1 query problem, which was reduced by using eager loading with `with('genre')`.

### G3. Your belongsTo method is named in singular. What would break if you made it plural?

The `belongsTo` relationship method is named `genre` in singular because each video game belongs to only one genre. If I named it `genres` instead, the code that accesses `$item->genre` and the eager loading call `with('genre')` would no longer match the relationship method name. This could cause errors when retrieving the related genre.

Samson Idanan Jr.
