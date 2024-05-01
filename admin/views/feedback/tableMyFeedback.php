<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                 <h2>Data Retrieval <strong>"Your Feedback"</strong> </h2>
                 <ul class="header-dropdown">
                     <li class="remove">
                         <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                     </li>
                 </ul>
             </div>
             <div class="body">
                 <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                         <thehead>
                             <tr>
                                 <th>STT</th>
                                 <th>Name</th>
                                 <th>Time</th>
                                 <th>Email</th>
                                 <th>Phone number</th>
                                 <th>Content</th>
                             </tr>
                         </thead>
                         <tfoot>
                             <tr>
                                 <th>STT</th>
                                 <th>Name</th>
                                 <th>Time</th>
                                 <th>Email</th>
                                 <th>Phone number</th>
                                 <th>Content</th>
                             </tr>
                         </tfoot>
                         <tbody>
                            <?php $stt = 0;
                            foreach ($feedbacks as $feedback) : $stt++; ?>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td><?= $feedback['name'] ?></td>
                                    <td><?= getTime($feedback['createTime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                    <td><?= $feedback['email'] ?></td>
                                    <td><?= $feedback['phone'] ?></td>
                                    <td><?= $feedback['subject'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
