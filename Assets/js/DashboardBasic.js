const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
    let logo_name = document.getElementsByClassName('logo-name')[0];
    let logo_name_style = window.getComputedStyle(logo_name);
    let logo_name_style_display = logo_name_style.getPropertyValue('display');
    if (logo_name_style_display == 'none') {
        logo_name.style.display = 'block';
    }
    else {
        logo_name.style.display = 'none';
    }

});

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchBtnIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

const toggler = document.getElementById('theme-toggle');

toggler.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
});

function onDashboardClick() {
    window.location.href = 'DashboardBasic.php';
    let coursAll = document.getElementsByClassName('coursAll');
    coursAll[0].style.display = 'none';
    let qcmAll = document.getElementsByClassName('qcmAll');
    qcmAll[0].style.display = 'none';
    let cours3 = document.getElementsByClassName('cours3');
    cours3[0].style.display = 'block';
    let qcm3 = document.getElementsByClassName('qcm3');
    qcm3[0].style.display = 'block';
    let insights = document.getElementsByClassName('insights');
    insights[0].style.display = 'grid';
    document.getElementsByTagName('main')[1].style.display = 'none';



}

function onCoursClick() {

    let coursAll = document.getElementsByClassName('coursAll');
    coursAll[0].style.display = 'block';
    coursAll[0].style.height = '700px';
    let cours3 = document.getElementsByClassName('cours3');
    cours3[0].style.display = 'none';
    let qcm = document.getElementsByClassName('reminders');
    for (var i = 0; i < qcm.length; i++) {
        qcm[i].style.display = 'none';
    }
    let forum = document.getElementsByClassName('insights');
    for (var i = 0; i < forum.length; i++) {
        forum[i].style.display = 'none';
    }
    let diss = document.getElementsByClassName('breadcrumb')
    diss[0].style.display = 'none'
    let forumAll = document.getElementsByClassName('discussionAll');
    forumAll[0].style.display = 'none';
    document.getElementsByTagName('main')[1].style.display = 'none';
    window.location.href = 'DashboardBasic.php';

}

function onQcmClick() {
    let qcmAll = document.getElementsByClassName('qcmAll');
    qcmAll[0].style.display = 'block';
    qcmAll[0].style.height = '700px';
    let qcm3 = document.getElementsByClassName('qcm3');
    qcm3[0].style.display = 'none';
    let cours = document.getElementsByClassName('orders');
    for (var i = 0; i < cours.length; i++) {
        cours[i].style.display = 'none';
    }
    // let insights = document.getElementsByClassName('insights');
    // insights[0].style.display = 'none';
    let forum = document.getElementsByClassName('insights');
    for (var i = 0; i < forum.length; i++) {
        forum[i].style.display = 'none';
    }
    let diss = document.getElementsByClassName('breadcrumb')
    diss[0].style.display = 'none'
    let forumAll = document.getElementsByClassName('discussionAll');
    forumAll[0].style.display = 'none';
    document.getElementsByTagName('main')[1].style.display = 'none';
    window.location.href = 'DashboardBasic.php';

}
function onForumClick() {
    // window.location.href = "DashboardBasic.php#section-courses";
    let diss = document.getElementsByClassName('breadcrumb')
    diss[0].style.display = 'flex'
    let qcmAll = document.getElementsByClassName('qcmAll');
    qcmAll[0].style.display = 'none';
    // qcmAll[0].style.height = '700px';
    let qcm3 = document.getElementsByClassName('qcm3');
    qcm3[0].style.display = 'none';
    let cours = document.getElementsByClassName('orders');
    for (var i = 0; i < cours.length; i++) {
        cours[i].style.display = 'none';
    }
    // let insights = document.getElementsByClassName('insights');
    // insights[0].style.display = 'none';
    let forum = document.getElementsByClassName('discussion4');
    forum[0].style.display = 'none';
    let forumAll = document.getElementsByClassName('discussionAll');
    forumAll[0].style.display = 'grid';
    document.getElementsByTagName('main')[1].style.display = 'none';
    window.location.href = 'DashboardBasic.php';
    let form = document.getElementsByClassName('form-input');
    form[0].style.display = 'none';

}

function changeVideo(vsrc, element) {
    var video = document.getElementById("video");
    video.src = vsrc; // Change to the new video source
    video.load(); // Reload the video element to apply changes
    video.play();
    let lis = document.querySelectorAll(".main1 .insights li");
    for (i = 0; i < lis.length; i++) {
        lis[i].style.background = 'var(--lighter)';
    }
    element.style.background = '#388E3C';
}
function changePDF(pdfSrc) {
    var pdf = document.getElementById("pdf");
    pdf.setAttribute("src", pdfSrc);
    let lis = document.querySelectorAll(".main2 .pdf-list li");
    for (i = 0; i < lis.length; i++) {
        lis[i].style.background = 'var(--lighter)';
    }
    element.style.background = '#388E3C';
}
function ouvrirPDFNouvelOnglet(pdfSrc) {
    window.open(pdfSrc, '_blank'); // Ouvre le PDF dans un nouvel onglet
}
function changeBackground(element) {
    let spans = document.getElementsByTagName('span');
    for (i = 0; i < spans.length; i++) {
        spans[i].classList.remove('active-video');
    }
    element.classList.add('active-video');
}

function afficherPlaylist(id) {
    window.location.href = 'DashboardBasic.php?video&id_cours=' + id;
}

function afficherPDF(id) {
    window.location.href = 'DashboardBasic.php?pdf&id_cours=' + id;
}

function afficherDiscussion(id_discussion) {
    window.location.href = 'Afficher_Discussion.php?discussion_id=' + id_discussion;
}
function onload(section) {
    if (section == "cours") {
        onCoursClick();
    }
    else if (section == "qcm") {
        onQcmClick();
    }
    else if (section == "forum") {
        onForumClick();
    }
    else {

    }
}
// // Fonction pour gérer le clic sur une icône PDF
// function handlePdfIconClick(event) {
//     // Récupérer l'ID du cours associé à cette icône
//     var coursId = event.currentTarget.getAttribute('data-cours-id');

//     // Rediriger l'utilisateur vers la page avec l'ID du cours PDF dans l'URL
//     window.location.href = 'DashboardBasic.php?id_cours_pdf=' + coursId;
// }

// // Ajouter un gestionnaire d'événements à toutes les icônes PDF avec la classe "pdf-icon"
// document.querySelectorAll('.pdf-icon').forEach(function(icon) {
//     icon.addEventListener('click', handlePdfIconClick);
// });

function qcm(path) {
    window.location.href = "qcm.php?" + path;
}