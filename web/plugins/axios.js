import { message } from "ant-design-vue"
import Cookie from "js-cookie"

export default function ({ $axios, redirect }, inject) {
	$axios.onRequest((config) => {
		console.log('Making request to ' + config.url)
	})

	$axios.onError((error) => {
		const code = parseInt(error.response && error.response.status)

		console.log(`Request to server failed with code ${code} `);
		if (code === 500) {
			message.error(`Request to server failed with code ${code} `);	
		}
		// if (code === 400) {
		// 	redirect('/400')
		// }
	})

	$axios.setBaseURL(process.env.apiBaseUrl);
	$axios.setHeader('Authorization', 'Bearer ' + Cookie.get('access_token'));  // jwt token	
	$axios.setHeader('Content-Type', 'application/json');
	$axios.setHeader('Accept', 'application/json');
	$axios.setHeader('Access-Control-Allow-Origin', '*');
	$axios.setHeader('X-Requested-With', 'XMLHttpRequest');

}
