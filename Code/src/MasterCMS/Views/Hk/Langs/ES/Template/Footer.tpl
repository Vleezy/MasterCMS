
	<div class="content">
		<div class="container-fluid">
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="{@url}/hk">
									Inicio
								</a>
							</li>
							<li>
								<a href="{@url}/hk/logout">
									Salir
								</a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="{@url}/web/mastercms" class="text-success">MasterCMS</a>, hecha con mucho <a class="text-danger" style="cursor: pointer;">❤</a> por <b class="text-primary">LxBlack</b> &amp; <b class="text-primary">Yonier</b> para <b class="text-info">{@name}</b>
					</p>
				</div>
			</footer>
		</div>
	</div>
	<script type="text/javascript" src="{@hk_cdn}/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="{@hk_cdn}/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{@hk_cdn}/js/material.min.js" type="text/javascript"></script>
	<script src="{@hk_cdn}/js/chartist.min.js"></script>
	<script src="{@hk_cdn}/js/bootstrap-notify.js"></script>
	<script src="{@hk_cdn}/js/material-dashboard.js"></script>
	<script src="{@hk_cdn}/js/demo.js"></script>
    <script>
    	$(document).ready(function() {
    		tinymce.init({
			  selector: '.tinytext',
			  menubar: false,
			  plugins: [
			    'advlist autolink lists link image charmap print preview anchor',
			    'searchreplace visualblocks code fullscreen',
			    'insertdatetime media table contextmenu paste code'
			  ],
			  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
			});
    	});
    </script>
</body>
</html>