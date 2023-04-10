function userLogin(url,id){

//   The rest of this code assumes you are not using a library.
//   It can be made less verbose if you use one.
  const form = document.createElement('form');
  form.method = 'GET';
  form.action = 'http://'+url+'/onelogin/'+id;

      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = 'api_token';
      hiddenField.value = 'ADVEX_AUHT_00001';
      form.appendChild(hiddenField);


  document.body.appendChild(form);
  form.submit();

}