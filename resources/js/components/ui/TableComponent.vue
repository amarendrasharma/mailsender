<template>
	<div>
		<table class="table-fixed">
			<thead class="bg-black flex text-white w-full">
				<tr class="flex w-full">
					<th class="px-4 py-2 w-1/6">#</th>
					<th class="px-4 py-2 w-2/6">Name</th>
					<th class="px-4 py-2 w-3/6">Email</th>
				</tr>
			</thead>

			<tbody
				class="flex flex-col items-center justify-between overflow-y-scroll w-full"
				style="height:500px"
			>
				<tr class="flex w-full" v-for="(mail,index) in mails" :key="index">
					<td class="border px-4 py-2 w-1/6">{{index}}</td>
					<td class="border px-4 py-2 w-2/6">{{mail.name}}</td>
					<td class="border px-4 py-2 w-3/6">{{mail.email}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>
<script>
	export default {
		props: ["mails"],
		computed: {
			mailsearch() {
				const searchString = this.searchstring.toLowerCase();
				return mails.filter(item => {
					item.email.toLowerCase().includes(searchstring);
				});
			}
		},

		data() {
			return {
				// emails: []
				searchstring: ""
			};
		}
	};
</script>