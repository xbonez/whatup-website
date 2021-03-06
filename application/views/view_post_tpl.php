<script type="text/template" id="tpl-post">		
	<div class="single-post">
		<div class="row-fluid topic">
			<h4><%= topic %></h4>
			<span class="post-actions">
				<span class="label label-inverse post-action post-action-edit" title="Edit this post"><i class="icon-edit icon-white"></i></span>
				<span class="label label-inverse post-action post-action-delete" title="Delete this post"><i class="icon-trash icon-white"></i></span>
			</span>
		</div>
		<div class="clearfix"></div>
		<div class="row-fluid">
			<div class="span12 well post-body">
				<%= body %>
			</div>	
		</div>

		<div class="row-fluid info-tags-row">
			<div class="span3 post-image-info-wrap">
				<img src="http://placehold.it/80" class="post-user-image" />
				<div class="post-info-wrap">
					<p class="post-info post-user-name">
						<a href="#">@<%= author.alias %></a>
					</p>
					<p class="post-info post-user-time timeago" title="<%= created_at %>">
						<%= created_at %>
					</p>
				</div>
			</div>	 
			<div class="span3 post-tags-wrapper pull-right">
				<% _.each(tags, function(tag) { %>				
					<a href="#" class="label label-info post-tag" data-id="<%= tag.id %>" data-content="<%= tag.summary %>" data-title="<%= tag.name %>" rel="popover" data-placement="top" >
						<i class="icon-tag icon-white"></i>	
						<%= tag.name %>
					</a>
				<% }); %>
			</div>	
		</div>	
	</div>
</script>

<script type="text/template" id="tpl-pagination">	
	<div class="pagination btn-group"> 

	</div>
</script>


