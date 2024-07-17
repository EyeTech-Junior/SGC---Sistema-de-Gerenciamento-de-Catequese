const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

const studentsItem = document.querySelector("#alunos-item");
studentsItem.addEventListener("click",function(){
    document.querySelector("#alunos-item").classList.add("active");
    document.querySelector("#turmas-item").classList.remove("active");
    document.querySelector("#coordenadores-item").classList.remove("active");
    document.querySelector("#list-screen").classList.add("show");
    document.querySelector("#turmas-screen").classList.remove("show");
    document.querySelector("#pesquisar-aluno").classList.add("show")
    document.querySelector("#pesquisar-coordenador").classList.remove("show")
    document.querySelector("#list-alunos-title").classList.add("show")
    document.querySelector("#list-coordenadores-title").classList.remove("show")
    document.querySelector("#btn-adicionar-aluno").classList.add("show")
    document.querySelector("#btn-adicionar-coordenador").classList.remove("show")
    document.querySelector("#main-addTurma").classList.remove("show");
    document.querySelector("#main-perfilCoordenador").classList.remove("show");
});

const coordenadoresItem = document.querySelector("#coordenadores-item");
coordenadoresItem.addEventListener("click",function(){
    document.querySelector("#coordenadores-item").classList.add("active");
    document.querySelector("#turmas-item").classList.remove("active");
    document.querySelector("#alunos-item").classList.remove("active");
    document.querySelector("#list-screen").classList.add("show");
    document.querySelector("#turmas-screen").classList.remove("show");
    document.querySelector("#pesquisar-aluno").classList.remove("show");
    document.querySelector("#pesquisar-coordenador").classList.add("show");
    document.querySelector("#list-alunos-title").classList.remove("show");
    document.querySelector("#list-coordenadores-title").classList.add("show");
    document.querySelector("#btn-adicionar-aluno").classList.remove("show");
    document.querySelector("#btn-adicionar-coordenador").classList.add("show");
    document.querySelector("#main-addTurma").classList.remove("show");
    document.querySelector("#main-perfilCoordenador").classList.remove("show");
});

const classesItem = document.querySelector("#turmas-item");
classesItem.addEventListener("click",function(){
    document.querySelector("#turmas-item").classList.add("active");
    document.querySelector("#alunos-item").classList.remove("active");
    document.querySelector("#coordenadores-item").classList.remove("active");
    document.querySelector("#turmas-screen").classList.add("show");
    document.querySelector("#list-screen").classList.remove("show");
    document.querySelector("#main-perfilStudent").classList.remove("show");
    document.querySelector("#main-addTurma").classList.remove("show");
    document.querySelector("#main-perfilCoordenador").classList.remove("show");
});

const perfilStudentBtn = document.querySelector("#btn-adicionar-aluno");
perfilStudentBtn.addEventListener("click",function(){
    document.querySelector("#turmas-item").classList.remove("active");
    document.querySelector("#alunos-item").classList.add("active");
    document.querySelector("#coordenadores-item").classList.remove("active");
    document.querySelector("#turmas-screen").classList.remove("show");
    document.querySelector("#list-screen").classList.remove("show");
    document.querySelector("#main-perfilCoordenador").classList.remove("show");
    document.querySelector("#main-perfilStudent").classList.add("show");
    document.querySelector("#main-addTurma").classList.remove("show");
});

const perfilCordenadorBtn = document.querySelector("#btn-adicionar-coordenador");
perfilCordenadorBtn.addEventListener("click",function(){
    document.querySelector("#turmas-item").classList.remove("active");
    document.querySelector("#alunos-item").classList.add("active");
    document.querySelector("#coordenadores-item").classList.remove("active");
    document.querySelector("#turmas-screen").classList.remove("show");
    document.querySelector("#list-screen").classList.remove("show");
    document.querySelector("#main-perfilStudent").classList.add("show");
    document.querySelector("#main-addTurma").classList.remove("show");
    document.querySelector("#main-perfilCoordenador").classList.add("show");
    document.querySelector("#main-perfilStudent").classList.remove("show");
});

const addTurmaBtn = document.querySelector("#btn-addTurma");
addTurmaBtn.addEventListener("click",function(){
    document.querySelector("#turmas-item").classList.add("active");
    document.querySelector("#alunos-item").classList.remove("active");
    document.querySelector("#coordenadores-item").classList.remove("active");
    document.querySelector("#turmas-screen").classList.remove("show");
    document.querySelector("#list-screen").classList.remove("show");
    document.querySelector("#main-perfilStudent").classList.remove("show");
    document.querySelector("#main-perfilCoordenador").classList.remove("show");
    document.querySelector("#main-addTurma").classList.add("show");
});
