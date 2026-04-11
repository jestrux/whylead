import { cr as PreviewHtml } from "./ui-CEN2B9Qh.js";
//#region resources/js/components/fieldtypes/replicator/ManagesPreviewText.js
var ManagesPreviewText_default = { computed: { previewText() {
	return Object.entries(this.previews).filter(([handle, value]) => {
		if (!handle.endsWith("_")) return false;
		handle = handle.substr(0, handle.length - 1);
		const config = this.config.fields.find((f) => f.handle === handle);
		if (!config) return false;
		return config.replicator_preview === void 0 ? this.showFieldPreviews : config.replicator_preview;
	}).map(([handle, value]) => value).filter((value) => [
		"null",
		"[]",
		"{}",
		"",
		void 0
	].includes(JSON.stringify(value)) ? null : value).map((value) => {
		if (value instanceof PreviewHtml) return value.html;
		if (typeof value === "string") return escapeHtml(value);
		if (Array.isArray(value) && typeof value[0] === "string") return escapeHtml(value.join(", "));
		return escapeHtml(JSON.stringify(value));
	}).join(" / ");
} } };
//#endregion
export { ManagesPreviewText_default as t };
