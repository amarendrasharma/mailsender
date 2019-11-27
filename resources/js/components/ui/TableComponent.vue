<template>
	<div>
		{{emails}}
		<table class="table-auto">
			<thead>
				<tr>
					<th class="px-4 py-2">#</th>
					<th class="px-4 py-2">Name</th>
					<th class="px-4 py-2">Email</th>
				</tr>
			</thead>

			<tbody>
				<tr class="bg-gray-100" v-for="(mail,index) in mails" :key="index">
					<td class="border px-4 py-2">{{index}}</td>
					<td class="border px-4 py-2">{{mail.name}}</td>
					<td class="border px-4 py-2">{{mail.email}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>
<script>
	export default {
		props: ["mails"],
		computed: {},

		data() {
			return {
				// emails: []
			};
		}
	};
</script>