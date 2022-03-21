function seedCookie(pageTitle) {
  var pageGlobalSession = localStorage.getItem(pageTitle);
  if(pageGlobalSession == null)
  {
    pageGlobalSession = 0;
  }
  var pageLocalSession = sessionStorage.getItem(pageTitle);

  if(pageLocalSession == null)
  {
    pageLocalSession = 0;
    for (let pageTitle in urlTree) {
      sessionStorage.setItem(pageTitle, 0);
    }
  }
  localStorage.setItem(pageTitle, parseInt(pageGlobalSession)+1);
  sessionStorage.setItem(pageTitle, parseInt(pageLocalSession)+1);
}
