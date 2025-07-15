<div style="max-width: 600px; margin: auto; font-family: 'Segoe UI', sans-serif; border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); overflow: hidden;">
  <div style="background-color: #007bff; color: #fff; padding: 16px 24px;">
    <h2 style="margin: 0; font-size: 20px;text-align: center;">📩 Contact Form Enquiry</h2>
  </div>

  <div style="padding: 20px 24px; background-color: #ffffff;">
    <table width="100%" cellpadding="10" cellspacing="0" style="font-size: 15px; color: #333;">
      <tr>
        <td style="font-weight: bold; width: 120px;">👤 Name:</td>
        <td>{{ $formData['name'] }}</td>
      </tr>
      <tr style="background-color: #f9f9f9;">
        <td style="font-weight: bold;">📧 Email:</td>
        <td>{{ $formData['email'] }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">📱 Mobile:</td>
        <td>{{ $formData['mobile'] }}</td>
      </tr>
      <tr style="background-color: #f9f9f9;">
        <td style="font-weight: bold;">📝 Subject:</td>
        <td>{{ $formData['subject'] }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">💬 Message:</td>
        <td>{{ $formData['message'] }}</td>
      </tr>
    </table>
  </div>

  <div style="background-color: #f1f1f1; padding: 14px 24px; font-size: 13px; text-align: center; color: #777;">
    This message was submitted via your website contact form.
  </div>
</div>