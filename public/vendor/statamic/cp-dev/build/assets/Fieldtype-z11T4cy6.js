import { ft as isRef, pt as markRaw } from "./vue.esm-bundler-Br3h1vy5.js";
import { I as containerContextKey, Ki as debounce_default, ra as _plugin_vue_export_helper_default } from "./ui-CEN2B9Qh.js";
import { t as HasFieldActions_default } from "./HasFieldActions-B8lK3QFz.js";
//#region resources/js/components/fieldtypes/props.js
var props_default = {
	value: { required: true },
	config: {
		type: Object,
		default: () => {
			return {};
		}
	},
	handle: {
		type: String,
		required: true
	},
	meta: {
		type: Object,
		default: () => {
			return {};
		}
	},
	readOnly: {
		type: Boolean,
		default: false
	},
	showFieldPreviews: {
		type: Boolean,
		default: false
	},
	namePrefix: String,
	fieldPathPrefix: String,
	metaPathPrefix: String,
	id: String
};
//#endregion
//#region resources/js/components/fieldtypes/emits.js
var emits_default = [
	"update:value",
	"update:meta",
	"focus",
	"blur",
	"replicator-preview-updated"
];
var Fieldtype_default = /* @__PURE__ */ _plugin_vue_export_helper_default({
	emits: emits_default,
	mixins: [HasFieldActions_default],
	inject: { injectedPublishContainer: { from: containerContextKey } },
	props: props_default,
	methods: {
		update(value) {
			this.$emit("update:value", value);
		},
		updateMeta(value) {
			this.$emit("update:meta", value);
		}
	},
	created() {
		this.updateDebounced = markRaw(debounce_default((value) => {
			this.update(value);
		}, 150));
	},
	computed: {
		publishContainer() {
			return Object.fromEntries(Object.entries(this.injectedPublishContainer).map(([key, value]) => [key, isRef(value) ? value.value : value]));
		},
		name() {
			if (this.namePrefix) return `${this.namePrefix}[${this.handle}]`;
			return this.handle;
		},
		isReadOnly() {
			return this.readOnly || this.config.visibility === "read_only" || this.config.visibility === "computed" || false;
		},
		replicatorPreview() {
			if (!this.showFieldPreviews) return;
			return this.value;
		},
		fieldPathKeys() {
			return (this.fieldPathPrefix || this.handle).split(".");
		},
		fieldId() {
			return this.id;
		},
		fieldActionPayload() {
			return {
				vm: this,
				fieldPathPrefix: this.fieldPathPrefix,
				handle: this.handle,
				value: this.value,
				config: this.config,
				meta: this.meta,
				update: this.update,
				updateMeta: this.updateMeta,
				isReadOnly: this.isReadOnly
			};
		}
	},
	watch: { replicatorPreview: {
		immediate: true,
		handler(text) {
			if (!this.showFieldPreviews) return;
			this.$emit("replicator-preview-updated", text);
		}
	} }
}, [["__file", "Fieldtype.vue"]]);
//#endregion
export { emits_default as n, props_default as r, Fieldtype_default as t };
