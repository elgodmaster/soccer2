<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td colspan="2">
				<br />
				{%=file.name%}
				<br />
				{%=o.formatFileSize(file.size)%}
			</td>
            <td class="name"><span>{%=file.name%}</span>			
			</td>
            <td class="size"><span>{%=file.description%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview" colspan="2">{% if (file.thumbnail_url) { %}
				
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}">
					<br />
					{%=file.name%}
					<br />
					{%=o.formatFileSize(file.size)%}
				</a>
            {% } %}</td>
            <td class="name">
                {%=file.description%}
            </td>
            <td class="size">
				{%=file.tDocument%}
			</td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <?php if ($this->multiple) : ?><input type="checkbox" name="delete" value="1">
            <?php else: ?><input type="hidden" name="delete" value="1">
            <?php endif; ?>
        </td>
    </tr>
{% } %}
</script>
