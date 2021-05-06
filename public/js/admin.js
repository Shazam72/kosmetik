// let smoothShowing = ($elements) => {
//     $elements.each((index)=>{
//         let $element=$($elements[index])
//         let target = $element.next();
//     let icon = $($element.children(".fas"));
//     $(target).slideToggle("slow");

//     $($element).click(function () {
//         $(target).slideToggle("slow");

//         if (icon.hasClass("fa-angle-down"))
//             icon.removeClass("fa-angle-down").addClass("fa-angle-up");
//         else 
//             icon.removeClass("fa-angle-up").addClass("fa-angle-down");
//     });
//     })
    
// };
// let catTitles=document.querySelectorAll('.all-products .cat-title');
// smoothShowing($(catTitles));
console.log
($(document.querySelector('.all-products .cat-title')).next().slideToggle("slow"));

