function getCookie(pageTitle, isLocalSession) {
    return (isLocalSession) ? localStorage.getItem(pageTitle) : sessionStorage.getItem(pageTitle);
}

function drawSessionTable(session) {
    for (var pageTitle in urlTree) {
        var result = getCookie(pageTitle, session)        
        document.write('<tr><td class="text-center">' + pageTitle + '</td>');
        document.write('<td class="text-center">' + ((result == null) ? "Не посещалась" : result) + '</td></tr>');
    }
}
