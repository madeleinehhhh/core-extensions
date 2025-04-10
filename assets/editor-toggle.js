const { registerPlugin } = wp.plugins;
const { PluginDocumentSettingPanel } = wp.editPost;
const { ToggleControl } = wp.components;
const { useSelect, useDispatch } = wp.data;
const { createElement: el } = wp.element;

const ContactInfoToggle = () => {
  const postType = wp.data.select("core/editor").getCurrentPostType();
  if (postType !== "ap_team") return null;

  const meta = useSelect((select) => select("core/editor").getEditedPostAttribute("meta"));
  const { editPost } = useDispatch("core/editor");

  return el(
    PluginDocumentSettingPanel,
    {
      name: "ap-team-contact-toggle",
      title: "Team Member Options",
      className: "ap-team-contact-toggle",
    },
    el(ToggleControl, {
      label: "Display Contact Info?",
      checked: !!meta.ap_show_contact_info,
      onChange: (value) => {
        editPost({ meta: { ap_show_contact_info: value } });
      },
    })
  );
};

registerPlugin("ap-team-contact-toggle", {
  render: ContactInfoToggle,
  icon: null,
});
