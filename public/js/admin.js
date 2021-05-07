$('#disconnect').click(function(e){
        e.preventDefault();
        swal({
            title: "Voulez-vous vous déconnecter ?",
            buttons: {
                confirm: true,
                cancel: true,
            },
        }).then((confirm) => {
            if (confirm) window.location.href = this.dataset.target;
        });
})
$('.delete').click(function(e){
        e.preventDefault();
        swal({
            title: "Voulez-vous vraiment supprimer ce produit ?",
            buttons: {
                confirm: true,
                cancel: true,
            },
        }).then((confirm) => {
            if (confirm) window.location.href = this.dataset.target;
        });
})

//dynamisme sur la sélection de la photo de profile
$('input#formFileMd[type="file"]').change(function(e){

    let file= this.files[0];
    let reader= new FileReader();
    reader.onload=()=>{
        document.querySelector('img#preview').src=reader.result;
        $('img#preview').css('display','block');
        
    };
    reader.readAsDataURL(file);

});



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
// console.log
// ($(document.querySelector('.all-products .cat-title')).next().slideToggle("slow"));
$('.card-cat').click(function(e){
    let target=document.querySelector(this.getAttribute('data-bs-target'));
    target.querySelector('.modal-body input#modify-cat-id').value=this.dataset.id;
    target.querySelector('.modal-body input#modify-cat-name').value=this.innerText;
})

