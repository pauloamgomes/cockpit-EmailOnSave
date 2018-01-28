<?php


$app->on('collections.save.after', function($name, $data) use($app) {

  $settings = $app->storage->getKey('cockpit/options', 'emailonsave.settings', []);

  $collections = isset($settings['collections']) ? $settings['collections'] : [];
  $email = isset($settings['email']) ? $settings['email'] : [];

  if (in_array($name, $collections) && !empty($email['to'])) {
    $subject = !empty($email['subject']) ? $email['subject'] : 'New collection saved';
    $body = isset($email['body']) ? $email['body'] : '';

    $dataHtml = '<br><hr><br>';
    foreach ($data as $key => $value) {
      $dataHtml .= '<div class="field">';
      $dataHtml .= "<div><b>${key}:</b></div>\n";
      if ($key === '_modified' || $key === '_created') {
        $value = date('Y-m-d H:i', $value);
      }
      if (is_string($value)) {
        $dataHtml .= "<div>${value}</div>\n";
      }
      else {
        $dataHtml .= "<pre>" . json_encode($value) . "</pre>\n";
      }
      $dataHtml .= '</div>';
    }
    $dataHtml .= '<br><br>';

    $body = str_replace('[:data]', $dataHtml, $body);

    $vars = [
      'name' => $name,
      'app' => $app,
      'body' => $body,
    ];

    $message = $app->view('emailonsave:emails/onsave.php', $vars);
    $options['cc'] = 'pauloamgomes2@gmail.com';

    $app->mailer->mail(
      $email['to'],
      $subject,
      $message,
      $options
    );

  }
});