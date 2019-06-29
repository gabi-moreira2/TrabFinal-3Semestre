<?php
	include("classeCabecalho.php");
    $c->exibe_menu();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <body>
		<!--Carousel-->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/carousel1.jpg" alt="Primeiro Slide"/>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel2.jpg" alt="Segundo Slide"/>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel3.jpg" alt="Terceiro Slide"/>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel4.jpg" alt="Quarto Slide"/>
                </div>
				<div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel5.jpg" alt="Quinto Slide"/>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
		</div>
		<br/>
		<div class="conteudo" style="width: 98%; margin: 5 15px 0 20px;">
			<!--Destaque-->
			<div class="card text-center" style="width: 98%; margin: 0 10px 0 15px;">
				<div class="card-header mb-2" style="color: white; background-color: #26BFBF;">
					Agendamento de viagem
				</div>
				<div class="card-body">
					<h5 class="card-title">Reserve sua viagem com a Fly High Turismo</h5>
					<p class="card-text">Já imaginou aquela viagem dos sonhos totalmente personalizada com o seu gosto?</p>
					<p class="card-text">
						Com a CG Turismo é você quem escolhe cada detalhe da sua viagem. Desde a data e local de saída e chegada até o hotel e sua companhia preferida. 
						<i class="material-icons text-danger">favorite</i>
					<p>
					<p class="card-text text-warning">Atenção: Desconto especiai de 10% no mês das férias!!<p>
					<br/>
					<a href="listar_reservas.php" class="btn" style="color: white; background-color: #26BFBF;"">Reservar viagem</a>
				</div>
				<div class="card-footer text-muted">2 dias atrás</div>
			</div>
			<br/>
			<!-- Cards -->
			<div class="card-deck" style="width: 100%; margin: 0 0 0 0;">
				<div class="card text-center">
					<div id="link1">
						<img src="img/destino1.jpg" class="card-img-top" alt="Mapa" onMouseOver="this.src='img/destino2_2.jpg'" onMouseOut="this.src='img/destino1.jpg'" />
						<!--<img src="img/destino1.jpg" class="card-img-top" alt="...">-->
					</div>
					<div class="card-body">
						<h5 class="card-title">Não sabe para onde ir?</h5>
						<p class="card-text">Querendo fazer aquela viagem mas não sabe para onde? Confira esse post maravilhoso do Por onde andamos com as melhores dicas de destinos para uma viagem inesquecível.</p>
						<a href="https://www.porondeandamos.com/lugares-para-viajar/" class="btn btn-primary">Visitar</a>
						<p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
					</div>
				</div>
				<div class="card text-center">
					<img src="img/passaporte1.jpg" class="card-img-top" alt="Passaporte" onMouseOver="this.src='img/passaporte2.jpg'" onMouseOut="this.src='img/passaporte1.jpg'" />
					<div class="card-body">
						<h5 class="card-title">Dúvidas com o passaporte?</h5>
						<p class="card-text">A Vamos para onde? preparou um post completo sobre vistos e passaportes com tudo que um viajante deve saber. Dê uma olhada!</p>
						<a href="https://vamospraonde.com/passaporte-e-visto/" class="btn btn-primary">Visitar</a>
						<p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
					</div>
				</div>
				<div class="card text-center">
					<img src="img/hotel1.jpg" class="card-img-top" alt="Hotel" onMouseOver="this.src='img/hotel2.jpg'" onMouseOut="this.src='img/hotel1.jpg'" />
					<div class="card-body">
						<h5 class="card-title">Os melhores hotéis</h5>
						<p class="card-text">Aqui na CG Turismo tem os melhores e mais confortavéis hotéis para sua viagem dos sonhos!</p>
						<a href="listar_hotel_facilidade.php" class="btn btn-primary">Confira</a>
						<p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
					</div>
				</div>
			</div>			
			<br/><br/>

			<!--Rodapé -->
			<footer class="rodape">
				<div class="social-icons">
					<a href="#"><i class="fab fa-facebook"></i></a>
				</div>
				<p class="copyright">
					Copyright &reg; CG Turismo 2019. Todos os direitos reservados.
				</p>
			</footer>
		</div>
		
		
		
		
		
		
		
    </body>
</html>