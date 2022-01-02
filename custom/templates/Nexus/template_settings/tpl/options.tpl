<!-- Options Content -->
<div class="card mb-3">
	<h3 class="card-header mb-3 text-center">{$OPTIONS_PAGE}</h3>
	<div class="card-body">

		<form action="" method="POST">
			<input type="hidden" name="sel_btn_session" value="options" />

			<div class="form-group">
				<label for="inputAbout">{$ABOUT_LABEL}</label>
				<select id="inputAbout" class="form-control mr-sm-2" name="about">
					<option value="0" {if $ABOUT_VALUE eq '0' } selected{/if}>{$DISABLED}</option>
					<option value="1" {if $ABOUT_VALUE eq '1' } selected{/if}>{$ENABLED}</option>
				</select>
			</div>
			{if $ABOUT_VALUE eq 1}
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control" id="template_about" name="template_about"
						placeholder="{$ABOUT_PLACEHOLDER_LABEL}" value="{$TEMPLATE_ABOUT}">
				</div>
			</div>
			{/if}
			<div class="form-group">
				<input type="hidden" name="token" value="{$TOKEN}">
				<button style="width: 100%;" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
					{$SUBMIT}</button>
			</div>
		</form>

	</div>
</div>