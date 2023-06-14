function buscarEndereco() {
  const cep = document.getElementById('cep').value
  const url = `https://viacep.com.br/ws/${cep}/json/`

  fetch(url)
    .then(response => response.json())
    .then(data => {
      const endereco = `${data.logradouro}, ${data.bairro}, ${data.localidade}, ${data.uf}`
      document.getElementById('endereco').textContent = endereco
    })
    .catch(error => {
      console.error('Erro ao buscar endereço:', error)
    });

}