<template>
    <div>
        <input type="file" @change="handleFileUpload" accept=".csv"/>
        <button @click="uploadFile">Upload</button>
    </div>
</template>

<script>
import axios from "axios";
import router from "../router/index.js";

export default {
    data() {
        return {
            selectedFile: null,
            uploadStartTime: null,
        };
    },
    methods: {
        handleFileUpload(event) {
            this.selectedFile = event.target.files[0];
            console.log('Selected file:', this.selectedFile);
        },
        async uploadFile() {
            if (!this.selectedFile) {
                alert("Please select a file before uploading.");
                return;
            }

            this.uploadStartTime = new Date(); // Record the start time

            const formData = new FormData();
            formData.append("file", this.selectedFile);

            console.log('Form data:', formData);

            try {
                await axios.post("/api/upload", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                });

                const uploadEndTime = new Date(); // Record the end time
                const timeTaken = (uploadEndTime - this.uploadStartTime) / 1000; // Convert to seconds
                alert(`File uploaded successfully! Time taken: ${timeTaken} seconds`);

                router.push('/');
            } catch (error) {
                console.error("Error uploading file:", error);
                if (error.response && error.response.data && error.response.data.errors) {
                    console.error("Validation errors:", error.response.data.errors);
                }
            }
        },
    },
};
</script>
