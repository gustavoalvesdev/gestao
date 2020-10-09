$(function(){

	/**
	 * A partir da classe do formulário, realiza à requisição
	 * ao arquivo PHP responsável por manipular os dados na
	 * base de dados, contido no diretório ajax/
	 */

	$('.form-clientes').ajaxForm({
		dataType: 'json',
		beforeSend: function() {
			$("#loadingImage").show();
			$('.form-clientes').animate({'opacity' : '0.6'})
			$('.form-clientes').find('input[type=submit]').prop('value', 'Cadastrando...')
			$('.form-clientes').find('input[type=submit]').attr('disabled', 'true')
		},
		success: function(data) {
			$("#loadingImage").hide();
			$('.form-clientes').animate({'opacity' : '1'})
			$('.form-clientes').find('input[type=submit]').prop('value', 'Cadastrar!')
			$('.form-clientes').find('input[type=submit]').removeAttr('disabled')
			//$('.box-alert').remove()

			if (data.sucesso) {
				Swal.fire({
					title: 'Sucesso!',
					text: data.mensagem,
					icon: 'success',
					confirmButtonText: 'OK!'
				})
			} else {
				Swal.fire({
					title: 'Erro!',
					text: data.mensagem,
					icon: 'error',
					confirmButtonText: 'OK!'
				})
			}

			//console.log(data)
		}
	})

	$('.form-clientes-update').ajaxForm({
		dataType: 'json',
		beforeSend: function() {
			$("#loadingImage").show();
			$('.form-clientes-update').animate({'opacity' : '0.6'})
			$('.form-clientes-update').find('input[type=submit]').prop('value', 'Atualizando...')
			$('.form-clientes-update').find('input[type=submit]').attr('disabled', 'true')
		},
		success: function(data) {
			$("#loadingImage").hide();
			$('.form-clientes-update').animate({'opacity' : '1'})
			$('.form-clientes-update').find('input[type=submit]').prop('value', 'Atualizar!')
			$('.form-clientes-update').find('input[type=submit]').removeAttr('disabled')
			//$('.box-alert').remove()

			if (data.sucesso) {
				Swal.fire({
					title: 'Sucesso!',
					text: data.mensagem,
					icon: 'success',
					confirmButtonText: 'OK!'
				})
			} else {
				Swal.fire({
					title: 'Erro!',
					text: data.mensagem,
					icon: 'error',
					confirmButtonText: 'OK!'
				})
			}

			//console.log(data)
		}
	})

	$('.form-empresa').ajaxForm({
		dataType: 'json',
		beforeSend: function() {
			$("#loadingImage").show();
			$('.form-empresa').animate({'opacity' : '0.6'})
			$('.form-empresa').find('input[type=submit]').prop('value', 'Cadastrando...')
			$('.form-empresa').find('input[type=submit]').attr('disabled', 'true')
		},
		success: function(data) {
			$("#loadingImage").hide();
			$('.form-empresa').animate({'opacity' : '1'})
			$('.form-empresa').find('input[type=submit]').prop('value', 'Cadastrar!')
			$('.form-empresa').find('input[type=submit]').removeAttr('disabled')
			//$('.box-alert').remove()

			if (data.sucesso) {
				Swal.fire({
					title: 'Sucesso!',
					text: data.mensagem,
					icon: 'success',
					confirmButtonText: 'OK!'
				})
			} else {
				Swal.fire({
					title: 'Erro!',
					text: data.mensagem,
					icon: 'error',
					confirmButtonText: 'OK!'
				})
			}

			//console.log(data)
		}
	})
})