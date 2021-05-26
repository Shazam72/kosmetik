$("#disconnect").click(function (e) {
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
});
$(".delete").click(function (e) {
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
});

$('input#formFileMd[type="file"]').change(function (e) {
    let file = this.files[0];
    let reader = new FileReader();
    reader.onload = () => {
        document.querySelector("img#preview").src = reader.result;
        $("img#preview").css("display", "block");
    };
    reader.readAsDataURL(file);
});

$(".card-cat").click(function (e) {
    let target = document.querySelector(this.getAttribute("data-bs-target"));
    target.querySelector(
        ".modal-body input#modify-cat-id"
    ).value = this.dataset.id;
    target.querySelector(
        ".modal-body input#modify-cat-name"
    ).value = this.innerText;
});
