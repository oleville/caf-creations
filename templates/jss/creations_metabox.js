// jQuery(document).ready(function($) {
//     var i = 1;
//     $('#add_ingredients').click(function() {
//         var ingredients = '<div class="ingredient"<input type="text" id="ingredients' + i + '"name="ingredients' + i + '"maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients', TRUE) ?>"/><input type="button" class="remove_ingredients" value="X">';
//         i++;
//         console.log(i);

//         $(this).before(ingredient);
//         $('.remove_ingredients').click(function() {
//             $(this).parent(".ingredients").remove();
//         });
//     })

//     $('.remove_ingredients').click(function() {
//         $(this).parent(".ingredients").remove();
//     });

// });
