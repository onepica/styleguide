OnePica Style Guide
===
The purpose of this module is to standardize and showcase many of the common styles of a site according to the style guide from the design team.  After the style guide has been implemented in css, this page also serves as a reference for the markup of these styles.

Frontend
---
After installing, this page can be accessed by going to `http://example.com/style-guide`

Customizing
---
Each pattern on the style-guide page has a corresponding .phtml file in the template directory under `template/styleguide/patterns/`.  The `template/styleguide/` directory should be copied into the site's design packages and edits can be made in there.  

For example, edit `template/styleguide/patterns/colors.phtml` to customize the color swatches for the site's design.

Extending 
--- 
To add another pattern that will be displayed on the /style-guide page, first create a .phtml file somewhere in the `template/styleguide/patterns/` directory.  The pattern then needs to be added to `template/styleguide/styleguide.json`.  A pattern consists of a key that will be displayed as the pattern's title and a value that is a path to a .phtml file (relative to `template/styleguide/patterns/`) or an array of patterns. 

