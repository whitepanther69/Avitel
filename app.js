const menu = document.querySelector('#mobile-menu')
const menuLinks = document.querySelector('.navbar__menu')

menu.addEventListener('click', function() {
    menu.classList.toggle('is-active')
    menuLinks.classList.toggle('active');


});

google.accounts.id.initialize({
    client_id: 'YOUR_CLIENT_ID',
    callback: handleCredentialResponse,
    use_fedcm_for_prompt: true //  Opt-in early
  });
  