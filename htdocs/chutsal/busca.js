<><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script>
    $(document).ready(function() {
        // Quando o usuário selecionar uma unidade
        $("#unidade").change(function () {
            var unidadeId = $(this).val();

            // Fazer uma requisição AJAX para buscar os dados da unidade
            $.ajax({
                type: "POST",
                url: "buscar_unidade.php",
                data: { unidade_id: unidadeId },
                success: function (response) {
                    // Preencher os campos de logradouro, CEP e bairro com os dados da unidade
                    var data = JSON.parse(response);
                    $("#logradouro").val(data.logradouro);
                    $("#cep").val(data.cep);
                    $("#bairro").val(data.bairro);
                }
            });
        })};
    );
</script></>
