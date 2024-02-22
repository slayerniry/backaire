<?php

require_once("../header.php");

?>

<style type="text/css">
	.col-centered {
		float: none;
		margin: 0 auto;
	}

	.carousel-control {
		width: 8%;
		width: 0px;
	}

	.carousel-control.left,
	.carousel-control.right {
		margin-right: 40px;
		margin-left: 32px;
		background-image: none;
		opacity: 1;
	}

	.carousel-control>a>span {
		color: white;
		font-size: 29px !important;
	}

	.carousel-col {
		position: relative;
		min-height: 1px;
		padding: 5px;
		float: left;
	}

	.active>div {
		display: none;
	}

	.active>div:first-child {
		display: block;
	}

	/*xs*/
	@media (max-width: 767px) {
		.carousel-inner .active.left {
			left: -50%;
		}

		.carousel-inner .active.right {
			left: 50%;
		}

		.carousel-inner .next {
			left: 50%;
		}

		.carousel-inner .prev {
			left: -50%;
		}

		.carousel-col {
			width: 50%;
		}

		.active>div:first-child+div {
			display: block;
		}
	}

	/*sm*/
	@media (min-width: 768px) and (max-width: 991px) {
		.carousel-inner .active.left {
			left: -50%;
		}

		.carousel-inner .active.right {
			left: 50%;
		}

		.carousel-inner .next {
			left: 50%;
		}

		.carousel-inner .prev {
			left: -50%;
		}

		.carousel-col {
			width: 50%;
		}

		.active>div:first-child+div {
			display: block;
		}
	}

	/*md*/
	@media (min-width: 992px) and (max-width: 1199px) {
		.carousel-inner .active.left {
			left: -33%;
		}

		.carousel-inner .active.right {
			left: 33%;
		}

		.carousel-inner .next {
			left: 33%;
		}

		.carousel-inner .prev {
			left: -33%;
		}

		.carousel-col {
			width: 33%;
		}

		.active>div:first-child+div {
			display: block;
		}

		.active>div:first-child+div+div {
			display: block;
		}
	}

	/*lg*/
	@media (min-width: 1200px) {
		.carousel-inner .active.left {
			left: -25%;
		}

		.carousel-inner .active.right {
			left: 25%;
		}

		.carousel-inner .next {
			left: 25%;
		}

		.carousel-inner .prev {
			left: -25%;
		}

		.carousel-col {
			width: 25%;
		}

		.active>div:first-child+div {
			display: block;
		}

		.active>div:first-child+div+div {
			display: block;
		}

		.active>div:first-child+div+div+div {
			display: block;
		}
	}

	.block {
		width: 306px;
		height: 200px;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-xs-11 col-md-10 col-centered">

			<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
				<div class="carousel-inner">
					<div class="item active">
						<div class="carousel-col">
							<div class="block red img-responsive">
								<img width="100%" height="100%" src="../img/1.jpg">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="carousel-col">
							<div class="block green img-responsive">
								<img width="100%" height="100%" src="../img/2.jpg">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="carousel-col">
							<div class="block blue img-responsive">
								<img width="100%" height="100%" src="../img/3.jpg">
							</div>
						</div>
					</div>
					<div class="item">
						<div class="carousel-col">
							<div class="block yellow img-responsive">
								<img width="100%" height="100%" src="../img/4.jpg">
							</div>
						</div>
					</div>
				</div>

				<!-- Controls -->
				<div class="left carousel-control">
					<a href="#carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
				</div>
				<div class="right carousel-control">
					<a href="#carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

		</div>
	</div>
</div>

<?php require_once("../footer.php")  ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.carousel[data-type="multi"] .item').each(function() {
			var next = $(this).next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));

			for (var i = 0; i < 3; i++) {
				next = next.next();
				if (!next.length) {
					next = $(this).siblings(':first');
				}

				next.children(':first-child').clone().appendTo($(this));
			}
		});


	});
</script>



<div class="panel with-nav-tabs panel-info">
	<div class="panel-heading">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#CATEGORIE" data-toggle="tab" aria-expanded="true">
					Catégories </a>
			</li>
			<li class="">
				<a href="#CLIENT" data-toggle="tab" aria-expanded="false">
					Clients </a>
			</li>
			<li class="">
				<a href="#FOURNISSEUR" data-toggle="tab" aria-expanded="false">
					Fournisseurs </a>
			</li>
			<li class="">
				<a href="#MODE" data-toggle="tab" aria-expanded="false">
					Mode de paiement </a>
			</li>
			<li class="">
				<a href="#PROFIL" data-toggle="tab" aria-expanded="false">
					Profils des utilisateurs </a>
			</li>
		</ul>
	</div>
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane fade active in" id="CATEGORIE">
				<fieldset>

					<a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="Ajouter" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=0&amp;tpr_code=CATEGORIE" class="glyphicon glyphicon-plus btnupdate"></span></a>

					<div class="table-responsive">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="dt-buttons"> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span>PDF</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span>Excel</span></button> </div>
							<div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Rechercher&nbsp;: <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div>
							<table class="table table-hover datatable_no_ajax dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
								<thead>
									<tr>
										<th width="100px" aria-label="
                                                                            Référence                                                                        : activer pour trier la colonne par ordre croissant" class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" style="width: 100px;">
											Référence </th>
										<th aria-label="
                                                                                Nom                                                                            : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 504px;">
											Nom </th>
										<th width="50px" aria-label="
                                                                            Action                                                                        : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 50px;">
											Action </th>
									</tr>
								</thead>
								<tbody>



















									<tr class="odd">
										<td class="sorting_1">
											VINAIGRE </td>
										<td>
											Vinaigre </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=113&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											SNACKS </td>
										<td>
											Snacks </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=130&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											SAVONDETER </td>
										<td>
											Savon et détergent </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=134&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											PRDLOCAUX </td>
										<td>
											Produits locaux </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=126&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											PRDHYGIEN </td>
										<td>
											Produits d'hygiène </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=133&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											PATISSERIE </td>
										<td>
											Patisserie </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=124&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											PATESNOU </td>
										<td>
											Pâtes et nouilles </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=128&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											LAIT </td>
										<td>
											Lait </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=119&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											HUILE </td>
										<td>
											Huile </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=112&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											FOURNSCOBU </td>
										<td>
											Fournitures scolaires et de bureau </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=135&amp;tpr_code=CATEGORIE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
								</tbody>
							</table>
							<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"><b>Debut:</b> 1 <b>Nombre:</b> 10 / 19 </div>
							<div class="dataTables_paginate paging_simple" id="DataTables_Table_0_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Précédent</a></li>
									<li class="paginate_button next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">Suivant</a></li>
								</ul>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="CLIENT">
				<fieldset>

					<a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="Ajouter" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=0&amp;tpr_code=CLIENT" class="glyphicon glyphicon-plus btnupdate"></span></a>

					<div class="table-responsive">
						<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="dt-buttons"> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>PDF</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>Excel</span></button> </div>
							<div id="DataTables_Table_1_filter" class="dataTables_filter"><label>Rechercher&nbsp;: <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_1"></label></div>
							<table class="table table-hover datatable_no_ajax dataTable no-footer" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
								<thead>
									<tr>
										<th width="100px" aria-label="
                                                                            Référence                                                                        : activer pour trier la colonne par ordre croissant" class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="descending" style="width: 100px;">
											Référence </th>
										<th aria-label="
                                                                                Nom                                                                            : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 0px;">
											Nom </th>
										<th aria-label="
                                                                                Phone                                                                            : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 0px;">
											Phone </th>
										<th width="50px" aria-label="
                                                                            Action                                                                        : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 50px;">
											Action </th>
									</tr>
								</thead>
								<tbody>






































									<tr class="odd">
										<td class="sorting_1">
											38 </td>
										<td>
											Nantenaina (tsena m/sina) </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=220&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											37 </td>
										<td>
											Mme Aingo </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=219&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											36 </td>
										<td>
											Niry </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=218&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											35 </td>
										<td>
											Eliane </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=215&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											34 </td>
										<td>
											M Nantenaina </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=210&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											33 </td>
										<td>
											Mme Santatra </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=205&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											32 </td>
										<td>
											Daddy </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=204&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											31 </td>
										<td>
											Peta </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=200&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											30 </td>
										<td>
											Danicà </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=199&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											29 </td>
										<td>
											escapade </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=198&amp;tpr_code=CLIENT" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
								</tbody>
							</table>
							<div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite"><b>Debut:</b> 1 <b>Nombre:</b> 10 / 38 </div>
							<div class="dataTables_paginate paging_simple" id="DataTables_Table_1_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" id="DataTables_Table_1_previous"><a href="#" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="0">Précédent</a></li>
									<li class="paginate_button next" id="DataTables_Table_1_next"><a href="#" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0">Suivant</a></li>
								</ul>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="FOURNISSEUR">
				<fieldset>

					<a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="Ajouter" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=0&amp;tpr_code=FOURNISSEUR" class="glyphicon glyphicon-plus btnupdate"></span></a>

					<div class="table-responsive">
						<div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="dt-buttons"> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_2" type="button"><span>PDF</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_2" type="button"><span>Excel</span></button> </div>
							<div id="DataTables_Table_2_filter" class="dataTables_filter"><label>Rechercher&nbsp;: <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_2"></label></div>
							<table class="table table-hover datatable_no_ajax dataTable no-footer" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
								<thead>
									<tr>
										<th width="100px" aria-label="
                                                                            Référence                                                                        : activer pour trier la colonne par ordre croissant" class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="descending" style="width: 100px;">
											Référence </th>
										<th aria-label="
                                                                                Nom                                                                            : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 0px;">
											Nom </th>
										<th aria-label="
                                                                                Phone                                                                            : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 0px;">
											Phone </th>
										<th width="50px" aria-label="
                                                                            Action                                                                        : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 50px;">
											Action </th>
									</tr>
								</thead>
								<tbody>











































									<tr class="odd">
										<td class="sorting_1">
											43 </td>
										<td>
											Top Cyber </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=217&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											42 </td>
										<td>
											SANI+ </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=216&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											41 </td>
										<td>
											LANDRYS SARLU </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=214&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											40 </td>
										<td>
											Nivo </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=213&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											39 </td>
										<td>
											AKERA </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=212&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											38 </td>
										<td>
											Chocolaterie ROBERT </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=211&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											37 </td>
										<td>
											EXIMCO </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=209&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											36 </td>
										<td>
											NUTRIZAZA </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=208&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											35 </td>
										<td>
											Fromage FI </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=207&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											34 </td>
										<td>
											NEW VISION DISTRIBUTION SARLU </td>
										<td>
										</td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=206&amp;tpr_code=FOURNISSEUR" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
								</tbody>
							</table>
							<div class="dataTables_info" id="DataTables_Table_2_info" role="status" aria-live="polite"><b>Debut:</b> 1 <b>Nombre:</b> 10 / 43 </div>
							<div class="dataTables_paginate paging_simple" id="DataTables_Table_2_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" id="DataTables_Table_2_previous"><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="0" tabindex="0">Précédent</a></li>
									<li class="paginate_button next" id="DataTables_Table_2_next"><a href="#" aria-controls="DataTables_Table_2" data-dt-idx="1" tabindex="0">Suivant</a></li>
								</ul>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="MODE">
				<fieldset>

					<a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="Ajouter" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=0&amp;tpr_code=MODE" class="glyphicon glyphicon-plus btnupdate"></span></a>

					<div class="table-responsive">
						<div id="DataTables_Table_3_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="dt-buttons"> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_3" type="button"><span>PDF</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_3" type="button"><span>Excel</span></button> </div>
							<div id="DataTables_Table_3_filter" class="dataTables_filter"><label>Rechercher&nbsp;: <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_3"></label></div>
							<table class="table table-hover datatable_no_ajax dataTable no-footer" id="DataTables_Table_3" aria-describedby="DataTables_Table_3_info">
								<thead>
									<tr>
										<th width="100px" aria-label="
                                                                            Référence                                                                        : activer pour trier la colonne par ordre croissant" class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-sort="descending" style="width: 100px;">
											Référence </th>
										<th aria-label="
                                                                                Nom                                                                            : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 0px;">
											Nom </th>
										<th width="50px" aria-label="
                                                                            Action                                                                        : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 50px;">
											Action </th>
									</tr>
								</thead>
								<tbody>



									<tr class="odd">
										<td class="sorting_1">
											MVOLA </td>
										<td>
											MVola </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=143&amp;tpr_code=MODE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											ESP </td>
										<td>
											Espèces </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=142&amp;tpr_code=MODE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											CHQ </td>
										<td>
											Chèque </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=141&amp;tpr_code=MODE" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
								</tbody>
							</table>
							<div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite"><b>Debut:</b> 1 <b>Nombre:</b> 3 / 3 </div>
							<div class="dataTables_paginate paging_simple" id="DataTables_Table_3_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" id="DataTables_Table_3_previous"><a href="#" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0">Précédent</a></li>
									<li class="paginate_button next disabled" id="DataTables_Table_3_next"><a href="#" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0">Suivant</a></li>
								</ul>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="PROFIL">
				<fieldset>

					<a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="Ajouter" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=0&amp;tpr_code=PROFIL" class="glyphicon glyphicon-plus btnupdate"></span></a>

					<div class="table-responsive">
						<div id="DataTables_Table_4_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="dt-buttons"> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4" type="button"><span>PDF</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_4" type="button"><span>Excel</span></button> </div>
							<div id="DataTables_Table_4_filter" class="dataTables_filter"><label>Rechercher&nbsp;: <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_4"></label></div>
							<table class="table table-hover datatable_no_ajax dataTable no-footer" id="DataTables_Table_4" aria-describedby="DataTables_Table_4_info">
								<thead>
									<tr>
										<th width="100px" aria-label="
                                                                            Référence                                                                        : activer pour trier la colonne par ordre croissant" class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" aria-sort="descending" style="width: 100px;">
											Référence </th>
										<th aria-label="
                                                                                Nom                                                                            : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" style="width: 0px;">
											Nom </th>
										<th width="50px" aria-label="
                                                                            Action                                                                        : activer pour trier la colonne par ordre croissant" class="sorting" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" style="width: 50px;">
											Action </th>
									</tr>
								</thead>
								<tbody>



									<tr class="odd">
										<td class="sorting_1">
											SAISIE </td>
										<td>
											Saisie </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=108&amp;tpr_code=PROFIL" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="even">
										<td class="sorting_1">
											CAISSE </td>
										<td>
											Caisse </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=137&amp;tpr_code=PROFIL" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
									<tr class="odd">
										<td class="sorting_1">
											ADMIN </td>
										<td>
											Admin </td>
										<td nowrap="">


											<a title="" data-toggle="popover" data-trigger="hover" data-content="Modifier" class="btn btn-success " href="#" data-original-title=""><span url="http://localhost/stock/pages/parametrage/formreferentielle.php?code=107&amp;tpr_code=PROFIL" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

										</td>
									</tr>
								</tbody>
							</table>
							<div class="dataTables_info" id="DataTables_Table_4_info" role="status" aria-live="polite"><b>Debut:</b> 1 <b>Nombre:</b> 3 / 3 </div>
							<div class="dataTables_paginate paging_simple" id="DataTables_Table_4_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" id="DataTables_Table_4_previous"><a href="#" aria-controls="DataTables_Table_4" data-dt-idx="0" tabindex="0">Précédent</a></li>
									<li class="paginate_button next disabled" id="DataTables_Table_4_next"><a href="#" aria-controls="DataTables_Table_4" data-dt-idx="1" tabindex="0">Suivant</a></li>
								</ul>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</div>