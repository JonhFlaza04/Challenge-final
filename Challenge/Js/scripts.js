let carrinho = [];
 
function adicionarCarrinho(produto) {
    carrinho.push(produto);
    atualizarCarrinho();
}
 
function removerCarrinho(produto) {
    const index = carrinho.indexOf(produto);
    if (index > -1) {
        carrinho.splice(index, 1);
    }
    atualizarCarrinho();
}
 
function atualizarCarrinho() {
    const listaCarrinho = document.getElementById("lista-carrinho");
    listaCarrinho.innerHTML = ""; // Limpa o carrinho antes de atualizar
 
    carrinho.forEach(produto => {
        const li = document.createElement("li");
        li.textContent = produto;
        const button = document.createElement("button");
        button.textContent = "Remover";
        button.onclick = () => removerCarrinho(produto);
        li.appendChild(button);
        listaCarrinho.appendChild(li);
    });
}
 
function finalizarCompra() {
    if (carrinho.length === 0) {
        alert("O carrinho está vazio.");
        return;
    }
 
    alert("Compra realizada com sucesso!"); // Simulação de finalização
    carrinho = []; // Limpa o carrinho
    atualizarCarrinho(); // Atualiza a interface
}