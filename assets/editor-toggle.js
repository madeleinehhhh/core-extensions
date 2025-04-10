const { registerPlugin } = wp.plugins;
const { PluginDocumentSettingPanel } = wp.editPost;
const { ToggleControl } = wp.components;
const { useSelect, useDispatch } = wp.data;

const ContactInfoToggle = () => {
  const meta = useSelect((select) => select("core/editor").getEditedPostAttribute("meta"));

  const { editPost } = useDispatch("core/editor");

  return (
    <PluginDocumentSettingPanel name="ap-team-contact-toggle" title="Team Member Options" className="ap-team-contact-toggle">
      <ToggleControl
        label="Display Contact Info?"
        checked={!!meta.ap_show_contact_info}
        onChange={(value) => {
          editPost({ meta: { ap_show_contact_info: value } });
        }}
      />
    </PluginDocumentSettingPanel>
  );
};

registerPlugin("ap-team-contact-toggle", {
  render: ContactInfoToggle,
  icon: null,
});
