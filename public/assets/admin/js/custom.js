/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#item-img-output").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// function readURL2 (input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();
//     reader.onload = function (e) {
//       $("#item-img-output2").attr("src", e.target.result);
//     };
//     reader.readAsDataURL(input.files[0]);
//   }
// }

// function readURL3 (input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();
//     reader.onload = function (e) {
//       $("#item-img-output3").attr("src", e.target.result);
//     };
//     reader.readAsDataURL(input.files[0]);
//   }
// }
