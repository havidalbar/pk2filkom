class MyUploadAdapter {
	constructor(loader) {
		// The file loader instance to use during the upload.
		this.loader = loader;
	}

	// Starts the upload process.
	upload() {
		return true;
	}
}

// ...

function MyCustomUploadAdapterPlugin(editor) {
	editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
		// Configure the URL to the upload script in your back-end here!
		return new MyUploadAdapter(loader);
	};
}

// ...

// DecoupledEditor
// 	.create(document.querySelector('#editor'), {
// 		extraPlugins: [MyCustomUploadAdapterPlugin],

// 		// ...
// 	})
// 	.then(editor => {
// 		const toolbarContainer = document.querySelector('#toolbar-container');

// 		toolbarContainer.appendChild(editor.ui.view.toolbar.element);
// 	})
// 	.catch(error => {
// 		console.error(error);
// 	});