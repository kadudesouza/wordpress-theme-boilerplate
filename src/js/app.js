// Axios configuration
const api = axios.create({
	baseURL: WPURL.base_url,
	headers: {
		'Authorization': `Basic ${WPURL.authorization_encoded}`,
		'X-WP-Nonce': WPURL.nonce
	}
});

